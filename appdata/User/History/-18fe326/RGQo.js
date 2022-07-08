const authMiddleware = (req, res, next) => {
    if (req.headers.authorization) {
      let tokenParts = req.headers.authorization
        .split(' ')[1]
        .split('.')
      let signature = crypto
        .createHmac('SHA256', tokenKey)
        .update(`${tokenParts[0]}.${tokenParts[1]}`)
        .digest('base64')
  
      if (signature === tokenParts[2])
        req.user = JSON.parse(
          Buffer.from(tokenParts[1], 'base64').toString(
            'utf8'
          )
        )
  
      next()
    }
}

module.exports = authMiddleware