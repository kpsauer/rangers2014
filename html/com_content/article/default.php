<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params		= $this->item->params;
$images     = json_decode($this->item->images);
$urls       = json_decode($this->item->urls);
$canEdit	= $this->item->params->get('access-edit');
$user		= JFactory::getUser();

?>
<div class="item-page<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<div class="page-header">
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>
	<?php endif; ?>
	<?php
if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
 echo $this->item->pagination;
}
 ?>
	
	<?php if (($params->get('show_modify_date')) or ($params->get('show_publish_date'))
		or ($params->get('show_hits')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_parent_category')) or ($params->get('show_author')) or $params->get('show_publish_date') or ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon'))) : ?>
	<aside>
		<?php if ($params->get('show_publish_date')) : ?>	
		<time datetime="<?php echo JHtml::_('date', $this->item->publish_up, 'Y-m-d'); ?>">
			<?php echo JHtml::_('date', $this->item->publish_up, JText::_('d')); ?>
			<span><?php echo JHtml::_('date', $this->item->publish_up, JText::_('M')); ?></span>
		</time>
		<?php endif; ?>
		
		<?php if (($params->get('show_modify_date')) or ($params->get('show_publish_date'))
			or ($params->get('show_hits')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_parent_category')) or ($params->get('show_author')) or ($params->get('show_tags', 1))) : ?>
		
		<dl class="article-info">
			<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
				<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
				<?php if (!empty($this->item->contactid) && $params->get('link_author') == true): ?>
					<?php
						$needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
						$menu = JFactory::getApplication()->getMenu();
						$item = $menu->getItems('link', $needle, true);
						$cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
					?>
					<dt class="createdby"><?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', '</dt><dd>' . JHtml::_('link', JRoute::_($cntlink), $author) . '</dd>'); ?>
				<?php else: ?>
					<dt class="createdby"><?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', '</dt><dd>' . $author . '</dd>'); ?>
				<?php endif; ?>
			<?php endif; ?>
			
			<?php if ($params->get('show_modify_date')) : ?>
			<dt class="modified"> <span class="icon-calendar"></span> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', '</dt><dd>' . JHtml::_('date', $this->item->modified, JText::sprintf('DATE_FORMAT_LC3')) . '</dd>'); ?>
			<?php endif; ?>
			
			<?php if ($params->get('show_publish_date')) : ?>
			<dt class="published"> <span class="icon-calendar"></span> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', '</dt><dd>' . JHtml::_('date', $this->item->publish_up, JText::sprintf('DATE_FORMAT_LC3')) . '</dd>'); ?>
			<?php endif; ?>
			
			<?php if ($params->get('show_hits')) : ?>
			<dt class="hits"> <span class="icon-eye-open"></span> <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', '</dt><dd>' . $this->item->hits . '</dd>'); ?>
			<?php endif; ?>
			
			<?php if ($params->get('show_create_date')) : ?>
			<dt class="create"> <span class="icon-calendar"></span> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', '</dt><dd>' . JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3')) . '</dd>'); ?>
			<?php endif; ?>
			
			<?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
				<?php $title = $this->escape($this->item->parent_title);
				$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
				<?php if ($params->get('link_parent_category') and $this->item->parent_slug) : ?>
					<dt class="parent-category-name"><?php echo JText::sprintf('COM_CONTENT_PARENT', '</dt><dd>' . $url . '</dd>'); ?>
				<?php else : ?>
					<dt class="parent-category-name"><?php echo JText::sprintf('COM_CONTENT_PARENT', '</dt><dd>' . $title . '</dd>'); ?>
				<?php endif; ?>
			<?php endif; ?>
			
			<?php if ($params->get('show_category')) : ?>
				<?php $title = $this->escape($this->item->category_title);
				$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
				<?php if ($params->get('link_category') and $this->item->catslug) : ?>
				<dt class="category-name"><?php echo JText::sprintf('COM_CONTENT_CATEGORY', '</dt><dd>' . $url . '</dd>'); ?>
				<?php else : ?>
				<dt class="category-name"><?php echo JText::sprintf('COM_CONTENT_CATEGORY', '</dt><dd>' . $title . '</dd>'); ?>
				<?php endif; ?>
			<?php endif; ?>
			
		</dl>
		<?php endif; ?>
		
		<?php if ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
		<div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i> <span class="caret"></span> </a>
			<ul class="dropdown-menu">
				<?php if (!$this->print) : ?>
				<?php if ($params->get('show_print_icon')) : ?>
				<li class="print-icon"> <?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php if ($params->get('show_email_icon')) : ?>
				<li class="email-icon"> <?php echo JHtml::_('icon.email',  $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
				<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
				<?php endif; ?>
				<?php else : ?>
				<li> <?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?> </li>
				<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
	</aside>
	<?php endif; ?>

	<?php if (($params->get('show_modify_date')) or ($params->get('show_publish_date'))
		or ($params->get('show_hits')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_parent_category')) or ($params->get('show_author')) or $params->get('show_publish_date') or ($canEdit ||  $params->get('show_print_icon') || $params->get('show_email_icon'))) : ?>

	
		<div class="kp-article">
		<?php if ($params->get('show_title') or (isset($images->image_fulltext) and !empty($images->image_fulltext))) : ?>
			<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
			<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
			<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image"> <img
			<?php if ($images->image_fulltext_caption):
				echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
			endif; ?>
			src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/> </div>
			<?php endif; ?>
			
			<h1 class="article-header">
				<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
					<a href="<?php echo $this->item->readmore_link; ?>"> <?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
					<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h1>
		<?php endif; ?>

	<?php else : ?>

		<div class="kp-article-static">
		<?php if ($params->get('show_title') or (isset($images->image_fulltext) and !empty($images->image_fulltext))) : ?>
			<?php  if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
			<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
			<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image"> <img
			<?php if ($images->image_fulltext_caption):
				echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
			endif; ?>
			src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/> </div>
			<?php endif; ?>
			
			<h1 class="article-header">
				<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
					<a href="<?php echo $this->item->readmore_link; ?>"> <?php echo $this->escape($this->item->title); ?></a>
				<?php else : ?>
					<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h1>
		<?php endif; ?>

	<?php endif; ?>



	<?php 
		if (isset ($this->item->toc)) :
			echo $this->item->toc;
		endif; 
	?>

	<?php  if (!$params->get('show_intro')) : echo $this->item->event->afterDisplayTitle; endif; ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>
	
	<?php if ($params->get('access-view')):?>
	
	<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
	echo $this->item->pagination;
 endif;
?>
	<?php echo $this->item->text; ?>
	
	<?php 
	//ToDo: move it to the proper place when config save will be available.
	if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position=='0')) OR  ($params->get('urls_position')=='0' AND empty($urls->urls_position) ))
		OR (empty($urls->urls_position) AND (!$params->get('urls_position')))): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	
	<?php if (isset($urls) AND ((!empty($urls->urls_position)  AND ($urls->urls_position=='1')) OR ( $params->get('urls_position')=='1') )): ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	
	<?php if ($params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
		<!--dt class="category-name" --><?php //echo JText::sprintf('TPL_LANG_TAGGED_UNDER', '</dt>'); ?>
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>

		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
	<?php endif; ?>
	
	<?php if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND!$this->item->paginationrelative): ?>
		<?php echo $this->item->pagination; ?>
	<?php endif; ?>
	
	<?php //optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true and  $user->get('guest') ) : ?>
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JURI($link1);?>
	<p class="readmore"> <a href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs);  ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
			    echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?>
		</a> </p>
	<?php endif; ?>
	<?php endif; ?>
		
	<?php
if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
	echo $this->item->pagination;
?>
	<?php endif; ?>
	</div>
	
	<?php echo $this->item->event->afterDisplayContent; ?> 
</div>
