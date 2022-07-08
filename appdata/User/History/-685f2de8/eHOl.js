const express = require('express')
const config = require('config')
const mongoose = require('mongoose')

const app = express()

const PORT = config.get('port')

async function start() {
    try {
        await mongoose.connect('mongodb://docker:mongopw@localhost:49153', {})
    } catch(e) {
        console.log(e.message)
        process.exit(1)
    }
}

app.listen(PORT, () => {
    console.log(`Server started on port ${PORT}`)
})