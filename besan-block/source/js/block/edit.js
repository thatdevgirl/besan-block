/**
 * EDIT: Chart block
 */

const { ColorPicker, PanelBody, SelectControl, TextControl } = wp.components;
const { InspectorControls } = wp.editor;
const { Fragment } = wp.element;

let besanEdit = ( props ) => {
  // Get the values needed from props.
  const { isSelected, setAttributes } = props;
  const { data, column, type, title, caption, color } = props.attributes;

  // Declare change event handlers.
  const onChangeData    = ( value ) => { setAttributes( { data: value } ) };
  const onChangeColumn  = ( value ) => { setAttributes( { column: value } ) };
  const onChangeType    = ( value ) => { setAttributes( { type: value } ) };
  const onChangeTitle   = ( value ) => { setAttributes( { title: value } ) };
  const onChangeCaption = ( value ) => { setAttributes( { caption: value } ) };
  const onChangeColor   = ( value ) => { setAttributes( { color: value.hex } ) };

  // Return the edit UI.
  return (
    <Fragment>
      { isSelected && (
        <InspectorControls>

          { /* Chart data input. */ }
          <PanelBody title='Data'>

            { ! bbOptions.apiKey && (
              <p className='bb-notice'>
                <strong>Important!</strong> <br />
                You have no Google Sheets API key defined. The chart will not display without this key.
                Please enter your API key on the  <a href="/wp-admin/options-general.php?page=besan_options">Besan Block settings page</a>.
              </p>
            ) }

            <TextControl
              label='Google Sheets URL'
              help='(The Google Sheet must be publically viewable.)'
              value={ data }
              onChange={ onChangeData }
            />

            <TextControl
              label='Column to chart'
              value={ column }
              onChange={ onChangeColumn }
            />

            <TextControl
              label='Chart title'
              help='(A short description, used to make the chart more accessible for screen readers.)'
              value={ title }
              onChange={ onChangeTitle }
            />
          </PanelBody>

          { /* Overall style options. */ }
          <PanelBody title='Display options'>
            <SelectControl
              label='Chart type'
              value={ type }
              options={ [
                { label: 'Vertical Bar', value: 'bar-vertical' },
                { label: 'Horizontal Bar', value: 'bar-horizontal' }
              ] }
              onChange={ onChangeType }
            />

            <label>
              Chart color
              <ColorPicker
                color={ color }
                onChangeComplete={ onChangeColor }
                disableAlpha
              />
            </label>
          </PanelBody>

        </InspectorControls>
      ) }

      <div id="bb-chart-edit">
        <div className={`bb-placeholder ${type}`}></div>

        <TextControl
          value={ caption }
          placeholder={ 'Write chart caption...' }
          onChange={ onChangeCaption }
          className='bb-edit-caption'
        />
      </div>
    </Fragment>
  );
};

export default besanEdit;
