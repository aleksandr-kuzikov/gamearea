import { useCallback, useState } from "react"

const storageField = 'jwtToken'

export const useAuth = () => {
    const [token, setToken] = useState(null)
    
    const login = useCallback((jwtToken) => {
        setToken(jwtToken)
        localStorage.setItem(storageField, jwtToken)
    }, [])

    const logout = useCallback((jwtToken) => {
        setToken(jwtToken)
        localStorage.setItem(storageField, jwtToken)
    }, [])

    return {login ,logout, token}
}