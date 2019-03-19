import React from 'react';
import ReactDOM from 'react-dom';

let Hello = () => {
    console.log('Hello, ES6 world');
}

helloWorld();

ReactDOM.render(
  <h1>Hello, React</h1>,
  document.querySelector('.js-hello-world')
);