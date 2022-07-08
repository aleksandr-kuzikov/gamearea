const express = require('express')
const config = require('config')
const jwt = require('jsonwebtoken')
const User = require('../../models/User')

const router = express.Router()
const tokenKey = config.get('jwtToken')

router.post('/', (req, res) => {
    user = {
        login: 'pam',
        password: 'pom'
    }

    const {login, password} = req.body

    const hasLogin = await User.findOne({ login })

    if (hasLogin) {
        res.status(400).json({ "message": "Пользователь с таким именем уже существует." })
    }

    if (
        login === user.login &&
        password === user.password
    ) {
        return res.status(200).json({
            // id: user.id,
            // login: user.login,
            token: jwt.sign({ id: user.id }, tokenKey)
        })
    }
})

module.exports = router