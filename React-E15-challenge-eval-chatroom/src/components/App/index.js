import React from 'react';

import Messages from '~/containers/Messages';
import Settings from '~/containers/Settings';
import Form from '~/containers/Form';
import './app.styl';

const App = () => (
  <div className="app">
    <h1 className="app-title">Chatroom</h1>
    <Messages />
    <Settings />
    <Form />
  </div>
);

export default App;
