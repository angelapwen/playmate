import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import SplashPage from './SplashPage'
import SignUp from './Signup'
import Login from './Login';
import Dashboard from './Dashboard';
import Update from './Update';
import * as serviceWorker from './serviceWorker';

ReactDOM.render(<SplashPage />, document.getElementById('root'));
ReactDOM.render(<SignUp />, document.getElementById('signup'));
ReactDOM.render(<Login />, document.getElementById('login'));
ReactDOM.render(<Dashboard />, document.getElementById('dashboard'));
ReactDOM.render(<Update />, document.getElementById('update'));


serviceWorker.unregister();