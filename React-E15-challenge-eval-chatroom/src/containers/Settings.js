import { connect } from 'react-redux';

import Settings from '~/components/Settings';

const mapStateToProps = (state, ownProps) => ({
  active: state.settings.active,
  usernameInput: state.settings.usernameInput,
});

const mapDispatchToProps = (dispatch, ownProps) => ({
  toggle: () => {
    dispatch({
      type: 'TOGGLE_SETTINGS',
    });
  },
  trackUsername: (evt) => {
    // 1. on lit une valeur dans le DOM du navigateur
    const { value: username } = evt.target;
    // 2. On communique cette valeur au reducer, pour traitement
    dispatch({
      type: 'TRACK_USERNAME',
      username,
    });
  },
  saveUsername: (evt) => {
    evt.preventDefault();
    dispatch({
      type: 'SAVE_USERNAME',
    });
  },
});

const SettingsContainer = connect(
  mapStateToProps, // lecture depuis le state
  mapDispatchToProps, // écriture dans le state (rien à faire dans ce cas)
)(Settings);

export default SettingsContainer;
