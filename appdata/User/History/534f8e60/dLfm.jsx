import { useState } from "react"
import { useFetch } from "../../hooks/fetch.hook"

export const LoginForm = () => {

    const {loading, errors, httpQuery} = useFetch()

    const [formData, setFormData] = useState({
        login: '',
        password: ''
    })

    const inputHandler = (e) => {
        setFormData((prev) => ({
            ...prev,
            [e.target.name]: e.target.value
        }))
    }

    const submitHandler = async e => {
        e.preventDefault()

        await httpQuery.get('https://jsonplaceholder.typicode.com/todos/1')
    }

    return(
        <form onSubmit={submitHandler}>
            <input type="text"
                name="login"
                onChange={inputHandler}
                value={formData.login}
            />
            <input type="password" 
                name="password"
                onChange={inputHandler}
                value={formData.password}
            />
            <button>Войти</button>
        </form>
    )
}