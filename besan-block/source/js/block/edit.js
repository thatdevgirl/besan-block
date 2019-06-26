/**
 * EDIT: Chart block
 */

const { PanelBody, SelectControl, TextControl } = wp.components;
const { InspectorControls } = wp.editor;
const { Fragment } = wp.element;

let besanEdit = ( props ) => {
  // Get the values needed from props.
  const { isSelected, setAttributes } = props;
  const { data, column, type, title, caption } = props.attributes;

  // Declare change event handlers.
  const onChangeData    = ( value ) => { setAttributes( { data: value } ) };
  const onChangeColumn  = ( value ) => { setAttributes( { column: value } ) };
  const onChangeType    = ( value ) => { setAttributes( { type: value } ) };
  const onChangeTitle   = ( value ) => { setAttributes( { title: value } ) };
  const onChangeCaption = ( value ) => { setAttributes( { caption: value } ) };

  // Return the edit UI.
  return (
    <Fragment>
      { isSelected && (
        <InspectorControls>

          { /* Chart data input. */ }
          <PanelBody title='Data'>
            <p className='bb-notice'>
              <strong>Important!</strong> <br />
              { data && ( <span>The <a href={ data }>Google sheet</a> <em>must</em> be publicly viewable.</span> ) }
              { ! data && ( <span>The Google sheet <em>must</em> be publicly viewable.</span> ) }
            </p>

            <TextControl
              label='Google Sheets URL'
              value={ data }
              onChange={ onChangeData }
            />

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

      <div id="bb-chart-edit">
        <TextControl
          value={ title }
          placeholder={ 'Write chart title...' }
          onChange={ onChangeTitle }
          className='bb-edit-title'
        />

        <div className='bb-placeholder'>
          Chart
        </div>

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
