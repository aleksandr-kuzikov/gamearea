const express = require('express')
const router = express.Router()

router.get('/', function() {
    console.log('About birds');
})

module.exports = router