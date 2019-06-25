/**
 * EDIT: Chart block
 */

const { PanelBody, SelectControl, TextControl } = wp.components;
const { InspectorControls } = wp.editor;
const { Fragment } = wp.element;

let besanEdit = ( props ) => {
  // Get the values needed from props.
  const { isSelected, setAttributes } = props;
  const { data, column, type } = props.attributes;

  // Declare change event handlers.
  const onChangeData   = ( value ) => { setAttributes( { data: value } ) };
  const onChangeColumn = ( value ) => { setAttributes( { column: value } ) };
  const onChangeType   = ( value ) => { setAttributes( { type: value } ) };

  // Return the edit UI.
  return (
    <Fragment>
      { isSelected && (
        <InspectorControls>

          { /* Chart data input. */ }
          <PanelBody title='Data'>
            <TextControl
              label='Google Sheets URL'
              value={ data }
              onChange={ onChangeData }
            />

            <p>
              <strong>Important!</strong> <br />
              The Google sheet <em>must</em> be publically viewable.
            </p>

            <TextControl
              label='Column to chart'
              value={ column }
              onChange={ onChangeColumn }
            />
          </PanelBody>

          { /* Overall style options. */ }
          <PanelBody title='Chart options'>
            <SelectControl
              label='Chart type'
              value={ type }
              options={ [
                { label: 'Vertical Bar', value: 'bar-vertical' },
                { label: 'Horizontal Bar', value: 'bar-horizontal' },
                { label: 'Pie', value: 'pie' },
              ] }
              onChange={ onChangeType }
            />
          </PanelBody>

        </InspectorControls>
      ) }

      <p>This will be a { type }.</p>
    </Fragment>
  );
};

export default besanEdit;
