import { get } from "config"
import { useCallback, useState } from "react"

export const useFetch = () => {
    const [loading, setLoading] = useState(false)
    const [errors, setErrors] = useState(null)

    const httpQuery = async (url, method, body, headers) => {
        setLoading(true)

        // headers['Authorization'] = `Bearer ${auth.token}`

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
            setErrors(e)
            throw e
        }
    }

    const get = useCallback(httpQuery(url, 'GET'), [loading])
    
    const post = useCallback(httpQuery(url, 'POST', body, headers = {
        'Content-Type': 'application/json'
    }), [loading])

    return {
        loading,
        errors
    }
}