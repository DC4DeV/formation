import io from 'socket.io-client';

let socket = null;
const socketMW = store => next => (action) => {
  switch (action.type) {
    case 'SOCKET_CONNECT': {
      socket = io('http://localhost:3000'); // on se connecte au serveur Socket.IO
      window.socket = socket;

      const displayMessage = (message) => {
        // Tiens, un message… et si on le stockait dans le state Redux ?
        store.dispatch({
          type: 'MESSAGE_RECEIVED',
          message,
        });
      };

      // similaire dans l'idée à un window.addEventListener('click', handleClick);
      socket.on('chat message', displayMessage);

      break;
    }
    case 'SEND_MESSAGE': {
      const globalState = store.getState();
      const { username } = globalState.settings;
      const { messageInput: content } = globalState;
      socket.emit('chat message', {
        username,
        content,
      });
    }
    default: next(action);
  }
};

export default socketMW;
