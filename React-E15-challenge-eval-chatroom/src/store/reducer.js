/**
 * État initial pour le state de l'application
 */
const initialState = {
  settings: {
    active: true,
    usernameInput: '', // input contrôlé pour track la valeur du pseudo qui change
    username: 'Anonymous',
  },
  messageInput: '',
  messages: [
    // {
    //   username: 'jd',
    //   content: 'Ça va ?',
    // },
    // {
    //   username: 'Yo',
    //   content: 'Oui et toi ?',
    // },
    // {
    //   username: 'jd',
    //   content: 'Il fait chaud :D',
    // },
  ],
};

/**
 * Reducer de l'application
 */
const reducer = (currentState = initialState, action = {}) => {
  switch (action.type) {
    case 'TOGGLE_SETTINGS':
      return {
        ...currentState,
        settings: {
          ...currentState.settings,
          active: !currentState.settings.active,
        },
      };
    case 'TRACK_USERNAME':
      return {
        ...currentState,
        settings: {
          ...currentState.settings,
          usernameInput: action.username,
        },
      };
    case 'SAVE_USERNAME':
      return {
        ...currentState,
        settings: {
          ...currentState.settings,
          username: currentState.settings.usernameInput,
          // usernameInput: '',
        },
      };
    case 'TRACK_MESSAGE':
      return {
        ...currentState,
        messageInput: action.value,
      };
    case 'SEND_MESSAGE':
      return {
        ...currentState,
        messageInput: '',
      };
    case 'MESSAGE_RECEIVED':
      return {
        ...currentState,
        messages: [...currentState.messages, action.message],
      };
    default: return currentState;
  }
};

export default reducer;
