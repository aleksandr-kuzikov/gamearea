import { useCallback, useEffect, useState } from "react"

const storageField = 'jwtToken'

export const useAuth = () => {
    const {id, login ,token} = useSelector(state => state.user)

    // const [token, setToken] = useState(null)
    
    // const login = useCallback((jwtToken) => {
    //     setToken(jwtToken)
    //     localStorage.setItem(storageField, jwtToken)
    // }, [])

    // const logout = useCallback(() => {
    //     setToken(null)
    //     localStorage.removeItem(storageField)
    // }, [])

    // useEffect(() => {
    //     const data = JSON.parse(localStorage.getItem(storageField))

    //     if (data && data.token) {
    //         login(data.token)
    //     }
    // }, [login])

    // return {login ,logout, token}
}