var express = require('express')
var auth = require('./auth')

var router = express.Router()

router.use(express.json())
router.use('/auth', auth)

module.exports = router