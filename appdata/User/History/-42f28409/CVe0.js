const express = require('express')
const config = require('config')
const jwt = require('jsonwebtoken')
const User = require('../../models/User')

const router = express.Router()
const tokenKey = config.get('jwtToken')

router.post('/register', (req, res) => {
    try {
        // user = {
        //     login: 'pam',
        //     password: 'pom'
        // }
    
        const {login, password} = req.body
    
        const hasLogin = User.findOne({ login })
    
        if (hasLogin) {
            res.status(400).json({ "message": "Пользователь с таким именем уже существует." })
        }
    
        const user = new User({ login, password })

        user.save()

        res.status(201).json({ "message": "Пользователь создан" })
    } catch (e) {}

    // if (
    //     login === user.login &&
    //     password === user.password
    // ) {
    //     return res.status(200).json({
    //         // id: user.id,
    //         // login: user.login,
    //         token: jwt.sign({ id: user.id }, tokenKey)
    //     })
    // }
})

router.post('/', (req, res) => {
    try {
        const {login, password} = req.body

        const user = User.findOne({ login })

        if (!user)
            res.status(400).json({ "message": "Пользователь не найден." })

        if (user.password !== password) 
            res.status(400).json({ "message": "Неверный пароль." })  

        return res.status(200).json({
            token: jwt.sign({ id: user.id }, tokenKey)
        })

    } catch (e) {}
})

module.exports = router