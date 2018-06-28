import React from 'react';
import PropTypes from 'prop-types';

import './form.styl';

const Form = ({
  messageValue,
  trackMessage,
  sendMessage,
}) => (
  <form
    className="app-form"
    onSubmit={(evt) => {
      evt.preventDefault();
      sendMessage();
    }}
  >
    <input
      type="text"
      className="app-form-input"
      placeholder="Votre message"
      value={messageValue}
      onChange={trackMessage}
    />
  </form>
);

Form.propTypes = {
  messageValue: PropTypes.string.isRequired,
  trackMessage: PropTypes.func.isRequired,
  sendMessage: PropTypes.func.isRequired,
};

export default Form;
