import 'babel-polyfill';
import React from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';

import App from '~/components/App';
import store from '~/store';

document.addEventListener('DOMContentLoaded', () => {
  const rootComponent = (
    <Provider store={store}>
      <App />
    </Provider>
  );
  const targetNode = document.getElementById('root');
  render(rootComponent, targetNode);
  store.dispatch({
    type: 'SOCKET_CONNECT',
  });
});
