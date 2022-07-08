import { useCallback, useState } from "react"
import { useAuth } from "./auth.hook"

export const useFetch = () => {
    const [loading, setLoading] = useState(false)
    const [errors, setErrors] = useState([])
    const {token} = useAuth()

    const fetchData = useCallback(async (url, method, body, headers) => {
        setLoading(true)

        if (token)
            headers['Authorization'] = `Bearer ${token}`
        
        if (body) {
            body = JSON.stringify(body)
            headers['Content-Type'] = 'application/json'
        }

        try {
            let response = await fetch(url, {headers, body, method})
            let data = await response.json()

            if (!response.ok) {
                throw new Error(data.message || 'Ошибка запроса.')
            }

            setLoading(false)

            return data
        } catch (e) {
            setLoading(false)
            setErrors((prev) => [...prev, {
                url,
                method,
                error: e
            }])
            
            throw e
        }
    }, [])

    return {
        loading,
        errors: {
            list: errors,
            clear: useCallback(() => setErrors([]), [])
        },
        httpQuery: {
            get: (url, headers) => fetchData(url, 'GET', headers), 
            post: (url, body, headers) => fetchData(url, 'POST', body, headers), 
            put: (url, body, headers) => fetchData(url, 'PUT', body, headers), 
            delete: (url, body, headers) => fetchData(url, 'DELETE', body, headers)
        }
    }
}