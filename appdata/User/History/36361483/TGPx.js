import { AuthPage } from "./pages/AuthPage";
import store from './redux/store'
import { Provider } from 'react-redux'

const App = () => {

    return (
        <Provider store={store} >
            <div className="App">
                <AuthPage />
            </div>
        </Provider>
    );
}

export default App;
