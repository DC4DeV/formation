import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';

const Message = ({
  username, // source ownProps
  content, // source ownProps
  own, // source container
}) => {
  const currentClassName = classNames(
    'app-message',
    {
      'app-message--own': own,
    },
  );
  return (
    <div className={currentClassName}>
      <div className="app-message-user">{username}</div>
      <div className="app-message-content">{content}</div>
    </div>
  );
};

Message.propTypes = {
  username: PropTypes.string.isRequired,
  content: PropTypes.string.isRequired,
  own: PropTypes.bool,
};

Message.defaultProps = {
  own: false,
};

export default Message;
