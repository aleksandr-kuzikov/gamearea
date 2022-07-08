const express = require('express')
const config = require('config')
const mongoose = require('mongoose')
const apiRout = require('./routes/api')
const app = express()

const PORT = config.get('port')

app.use('/api', apiRout)

async function start() {
    try {
        await mongoose.connect(config.get('mongoConnect'), {})

        app.listen(PORT, () => { console.log(`Server started on port ${PORT}`) })
    } catch(e) {
        console.log(e.message)
        process.exit(1)
    }
}

start()
