import React from 'react';
import PropTypes from 'prop-types';

import Message from '~/containers/Message';
import './messages.styl';

const Messages = ({
  messages,
}) => (
  <div className="app-messages">
    {
      messages.map(message => (
        <Message key={message.id} {...message} />
      ))
    }
  </div>
);

Messages.propTypes = {
  messages: PropTypes.arrayOf(PropTypes.shape({
    content: PropTypes.string.isRequired,
  })).isRequired,
};

export default Messages;
