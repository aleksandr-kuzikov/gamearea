import { createSlice } from '@reduxjs/toolkit'

export const userSlice = createSlice({
    name: 'user',
    initialState: {
        id: null,
        login: null,
        token: null
    },
    reducers: {
        setUser(state, action) {
            state.id = action.payload.id
            state.login = action.payload.login
            state.token = action.payload.token
        },
        removeUser(state) {
            state.id = null
            state.login = null
            state.token = null
        }
    }
})

export const { setUser, removeUser } = userSlice.actions

export default userSlice.reducer