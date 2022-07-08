import { get } from "config"
import { useCallback, useState } from "react"

export const useFetch = () => {
    const [loading, setLoading] = useState(false)
    const [errors, setErrors] = useState([])

    const httpQuery = useCallback(async (url, method, body, headers) => {
        setLoading(true)

        // headers['Authorization'] = `Bearer ${auth.token}`
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
    }, [loading, setLoading, errors, setErrors])

    const get = (url) => httpQuery(url, 'GET')
    
    const post = (url, body) => httpQuery(url, 'POST', body)

    return {
        loading,
        errors,
        crud: {get, post}
    }
}