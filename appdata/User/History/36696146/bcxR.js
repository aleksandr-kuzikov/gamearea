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
        removeUser() {

        }
    }
})

// Action creators are generated for each case reducer function
export const { increment, decrement, incrementByAmount } = counterSlice.actions

export default counterSlice.reducer