import { connect } from 'react-redux';

import Messages from '~/components/Messages';

const mapStateToProps = (state, ownProps) => ({
  messages: state.messages,
});

const MessagesContainer = connect(
  mapStateToProps, // lecture depuis le state
  null, // écriture dans le state (rien à faire dans ce cas)
)(Messages);

export default MessagesContainer;
