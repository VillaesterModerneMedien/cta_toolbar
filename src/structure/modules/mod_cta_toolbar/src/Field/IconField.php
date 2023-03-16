<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */
namespace Joomla\Module\CTAToolbar\Site\Field;

\defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Uri\Uri;

/**
 * Form Field class for the Joomla Platform.
 * Supports a one line text field.
 *
 * @link   https://html.spec.whatwg.org/multipage/input.html#text-(type=text)-state-and-search-state-(type=search)
 * @since  1.7.0
 */

class IconField extends FormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  1.7.0
	 */
	protected $type = 'Icon';

	/**
	 * Name of the layout being used to render the field
	 *
	 * @var    string
	 * @since  3.7
	 */
	protected $layout = 'joomla.form.field.iconfeld';

    /**
     * Get the renderer
     *
     * @param   string  $layoutId  Id to load
     *
     * @return  FileLayout
     *
     * @since   3.5
     */
    protected function getRenderer($layoutId = 'default')
    {
        $renderer = new FileLayout($layoutId);

        $renderer->setDebug($this->isDebugEnabled());

        $layoutPaths = $this->getLayoutPaths();

        if ($layoutPaths)
        {
            $renderer->setIncludePaths($layoutPaths);
        }
        $renderer->addIncludePath(JPATH_ROOT . '/modules/mod_cta_toolbar/layouts');

        return $renderer;
    }
}
