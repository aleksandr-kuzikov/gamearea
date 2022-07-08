const express = require('express')
const config = require('config')

const app = express()

const PORT = config.get('port')

async function start() {
    try {

    } catch(e) {
        console.log(e.message)
        process.exit(1)
    }
}

app.listen(PORT, () => {
    console.log(`Server started on port ${PORT}`)
})