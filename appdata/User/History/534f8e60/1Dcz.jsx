import { useState } from "react"

export const LoginForm = () => {

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

    return(
        <form>
            <input type="text"
                name="login"
            />
            <input type="password" 
                name="password"
            />
        </form>
    )
}