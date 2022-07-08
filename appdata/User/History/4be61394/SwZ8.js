import { useCallback, useState } from "react"

export const useFetch = () => {
    const [loading, setLoading] = useState(false)
    const [errors, setErrors] = useState([])

    const fetchData = async (url, method, body, headers) => {
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
    }

    return {
        loading,
        errors,
        get: useCallback((url) => fetchData(url, 'GET'), []), 
        // httpQuery: {
        //     get: useCallback((url) => fetchData(url, 'GET'), []), 
        //     post: useCallback((url, body) => fetchData(url, 'POST', body), []), 
        //     put: useCallback((url, body) => fetchData(url, 'PUT', body), []), 
        //     delete: useCallback((url, body) => fetchData(url, 'DELETE', body), [])
        // }
    }
}