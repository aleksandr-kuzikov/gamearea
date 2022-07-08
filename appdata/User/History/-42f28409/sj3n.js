const express = require('express')
const config = require('config')
const jwt = require('jsonwebtoken')
const User = require('../../models/User')

const router = express.Router()
const tokenKey = config.get('jwtToken')

router.post('/register', async (req, res) => {
    console.log(req.body)
    try {
    
        const {login, password} = req.body
    
        const hasUser = await User.findOne({ login })

        if (hasUser) 
            return res.status(400).json({ "message": "Пользователь с таким именем уже существует." })
    
        const user = new User({ login, password })

        await user.save()

        return res.status(201).json({ "message": "Пользователь создан" })
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

router.post('/', async (req, res) => {
    try {
        const {login, password} = req.body

        const user = User.findOne({ login })
        
        if (!user)
            return res.status(400).json({ "message": "Пользователь не найден." })

        if (user.password !== password) 
            return res.status(400).json({ "message": "Неверный пароль.", "pass_serv": user.password, "pass_req": password })  

        return res.status(200).json({
            token: jwt.sign({ id: user.id }, tokenKey)
        })

    } catch (e) {}
})

module.exports = router