import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import SplashPage from './SplashPage'
import Login from './Login';
import * as serviceWorker from './serviceWorker';

ReactDOM.render(<SplashPage />, document.getElementById('root'));
ReactDOM.render(<Login />, document.getElementById('login'));

serviceWorker.unregister();