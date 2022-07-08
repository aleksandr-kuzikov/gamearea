const express = require('express')
const config = require('config')
const authMiddleware = require('../../middleware/auth.middleware')
const authRout =  require('./auth')
const router = express.Router()
const tokenKey = config.get('jwtToken')


router.use(express.json())
// router.use(authMiddleware)
router.use('/auth', authRout)

module.exports = router