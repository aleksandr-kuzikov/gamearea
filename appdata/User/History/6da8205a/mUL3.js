import { useCallback, useState } from "react"

const storageField = 'jwtToken'

export const useAuth = () => {
    const [token, setToken] = useState(null)
    
    const login = useCallback((jwtToken) => {
        setToken(jwtToken)
        localStorage.setItem(storageField, jwtToken)
    }, [])

    const logout = useCallback(() => {
        setToken(null)
        localStorage.setItem(storageField, null)
    }, [])

    return {login ,logout, token}
}