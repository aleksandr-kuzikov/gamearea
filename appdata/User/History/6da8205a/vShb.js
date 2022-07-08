import { useState } from "react"

export const useAuth = () => {
    const [token, setToken] = useState(null)
    
    const login = () => {

    }

    const logout = () => {

    }

    return {login ,logout, token}
}