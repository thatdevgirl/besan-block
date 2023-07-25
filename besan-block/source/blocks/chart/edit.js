/**
 * EDIT: Chart block
 */

import besanIcons from './icons.js';

const besanEdit = ( props ) => {

  const { InspectorControls, useBlockProps } = wp.blockEditor;
  const { ColorPicker, Panel, PanelBody, SelectControl, TextControl } = wp.components;

  // Get the values needed from props.
  const { setAttributes } = props;
  const { data, column, type, title, caption, color } = props.attributes;
  const blockProps = useBlockProps();

  // Declare change event handlers.
  const onChangeData    = ( value ) => { setAttributes( { data: value } ) };
  const onChangeColumn  = ( value ) => { setAttributes( { column: value } ) };
  const onChangeType    = ( value ) => { setAttributes( { type: value } ) };
  const onChangeTitle   = ( value ) => { setAttributes( { title: value } ) };
  const onChangeCaption = ( value ) => { setAttributes( { caption: value } ) };
  const onChangeColor   = ( value ) => { setAttributes( { color: value.hex } ) };

  // Return the edit UI.
  return (
    <div { ...blockProps }>

      <InspectorControls>

        { /* Chart data. */ }
        <Panel>
          <PanelBody title='Data source'>

            <p className='besan-editor-note info'>
              Enter your Google Sheet URL and the letter of the column to be
              included in this chart. The Google Sheet <em>must</em> be
              publicly viewable.
            </p>

            { /* Warning to content teditors to add an API key if one has */}
            { /* already been added to Settings. */ }
            { ! besanOptions.apiKey && (
              <p className='besan-editor-note warning'>
                <strong>Important!</strong> <br />
                You have no Google Sheets API key defined. The chart will not
                display without this key. Please enter your API key on 
                the <a href="/wp-admin/options-general.php?page=besan_options">Besan
                Block settings page</a>.
              </p>
            ) }

            { /* Google Sheets URL. */ }
            <TextControl
              label='Google Sheets URL'
              value={ data }
              onChange={ onChangeData }
            />

            { /* Spreadsheet column. */ }
            <TextControl
              label='Column'
              value={ column }
              onChange={ onChangeColumn }
            />

          </PanelBody>
        </Panel>

        { /* Overall style options. */ }
        <Panel>
          <PanelBody title='Display options'>

            { /* Chart type. */ }
            <SelectControl
              label='Chart type'
              value={ type }
              options={ [
                { label: 'Vertical Bar', value: 'bar-vertical' },
                { label: 'Horizontal Bar', value: 'bar-horizontal' }
              ] }
              onChange={ onChangeType }
            />

            { /* Chart color. */ }
            <label>
              Chart color
              <ColorPicker
                color={ color }
                onChangeComplete={ onChangeColor }
                disableAlpha
              />
            </label>

          </PanelBody>
        </Panel>

        <Panel>
          <PanelBody title='Accessibility'>

            <p className='besan-editor-note info'>
              Type a short description of the chart. This should be different
              from the caption. The title will not be visible to sighted
              users, but will be used as the internal title of the chart to
              make it more accessible for screen reader users.
            </p>

            <TextControl
              label='Chart title'
              value={ title }
              onChange={ onChangeTitle }
            />

          </PanelBody>
        </Panel>

      </InspectorControls>

      <div id="besan-chart-edit">

        { /* Show a placeholder appropriate to the selected chart type. */ }
        { type == 'bar-vertical' && (
          <div className='besan-placeholder' style={{ fill: color }}>
            { besanIcons.barVertical }
          </div>
        ) }

        { type == 'bar-horizontal' && (
          <div className='besan-placeholder' style={{ fill: color }}>
            { besanIcons.barHorizontal }
          </div>
        ) }

        { /* Chart caption. */ }
        <TextControl
          value={ caption }
          placeholder={ 'Write chart caption...' }
          onChange={ onChangeCaption }
          className='besan-edit-caption'
        />

      </div>

    </div>
  );
};

export default besanEdit;
