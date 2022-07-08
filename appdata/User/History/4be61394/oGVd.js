import { useCallback, useState } from "react"

export const useFetch = () => {
    const [loading, setLoading] = useState(false)

    let result = useCallback(async (url, method='GET', body, headers) => {
        setLoading(true)

        let response = await fetch(url, {headers, body, method})
        let data = await response.json()

        setLoading(false)

        return data
    }, [setLoading])
}