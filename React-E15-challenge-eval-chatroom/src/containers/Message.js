import { connect } from 'react-redux';

import Message from '~/components/Message';

const mapStateToProps = (state, ownProps) => ({
  own: ownProps.username === state.settings.username,
});

const MessageContainer = connect(
  mapStateToProps, // lecture depuis le state
  null, // écriture dans le state (rien à faire dans ce cas)
)(Message);

export default MessageContainer;
