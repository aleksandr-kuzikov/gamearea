const express = require('express')
const config = require('config')
const jwt = require('jsonwebtoken')

const router = express.Router()
const tokenKey = config.get('jwtToken')

router.post('/', function() {
    user = {
        login: 'pam',
        password: 'pom'
    }
    if (
        req.body.login === user.login &&
        req.body.password === user.password
    ) {
        return res.status(200).json({
            // id: user.id,
            // login: user.login,
            token: jwt.sign({ id: user.id }, tokenKey)
        })
    }
})

module.exports = router