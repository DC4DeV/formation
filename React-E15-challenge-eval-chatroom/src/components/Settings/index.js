import React from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';

import './settings.styl';

const Settings = ({
  active: open,
  usernameInput: usernameValue,
  toggle,
  trackUsername,
  saveUsername,
}) => {
  const currentClassName = classNames(
    'app-settings',
    {
      'app-settings--open': open,
    },
  );
  return (
    <div className={currentClassName}>
      {/* eslint-disable-next-line jsx-a11y/click-events-have-key-events */}
      <div
        className="app-settings-toggle"
        onClick={toggle}
      />
      <form
        className="app-settings-form"
        onSubmit={saveUsername}
      >
        <input
          type="text"
          className="app-settings-input"
          placeholder="Votre pseudo"
          value={usernameValue}
          onChange={trackUsername}
        />
        <button className="app-settings-button">OK</button>
      </form>
    </div>
  );
};

Settings.propTypes = {
  active: PropTypes.bool.isRequired,
  usernameInput: PropTypes.string.isRequired,
  toggle: PropTypes.func.isRequired,
  trackUsername: PropTypes.func.isRequired,
  saveUsername: PropTypes.func.isRequired,
};

export default Settings;
