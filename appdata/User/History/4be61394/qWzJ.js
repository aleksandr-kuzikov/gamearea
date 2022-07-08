import { useCallback, useState } from "react"

export const useFetch = () => {
    const [loading, setLoading] = useState(false)

    let result = useCallback(async () => {
        setLoading(true)

        let response = await fetch(url, {headers, body, method})

    }, [setLoading])
}