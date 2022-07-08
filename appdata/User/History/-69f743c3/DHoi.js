const express = require('express')
const config = require('config')
const auth = require('./auth')
const authMiddleware = require('../../middleware/auth.middleware')

const router = express.Router()
const tokenKey = config.get('jwtToken')


router.use(express.json())
router.use(authMiddleware)
router.use('/auth', auth)

module.exports = router