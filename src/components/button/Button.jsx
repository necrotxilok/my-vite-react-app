import React from 'react'
import PropTypes from 'prop-types'
import './button.css'

const theme = window.MainTheme || {}

const Button = (props) => {
	return (
		<button
			className="btn"
			style={{
				backgroundColor: theme.primaryColor,
			}}
			onClick={() => {
				console.log('Button Pressed!!')
				props.onClick && props.onClick()
			}}
		>
			{props.label}
		</button>
	)
}

Button.propTypes = {
	label: PropTypes.string.isRequired,
	onClick: PropTypes.func,
};

Button.defaultProps = {
	onClick: undefined,
};
  
export default Button
