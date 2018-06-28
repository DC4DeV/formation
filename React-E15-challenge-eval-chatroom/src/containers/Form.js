import { connect } from 'react-redux';

import Form from '~/components/Form';

const mapStateToProps = (state, ownProps) => ({
  messageValue: state.messageInput,
});

const mapDispatchToProps = (dispatch, ownProps) => ({
  trackMessage: (evt) => {
    const { value } = evt.target;
    dispatch({
      type: 'TRACK_MESSAGE',
      value,
    });
  },
  sendMessage: () => {
    dispatch({
      type: 'SEND_MESSAGE',
    });
  },
});

const FormContainer = connect(
  mapStateToProps, // lecture depuis le state
  mapDispatchToProps, // écriture dans le state (rien à faire dans ce cas)
)(Form);

export default FormContainer;
