const express = require('express')
const config = require('config')
const auth = require('./auth')

const jwtToken = config.get('jwtToken')
const router = express.Router()

router.use(express.json())
router.use('/auth', auth)

module.exports = router