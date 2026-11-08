/* Civic Hearth navigation. Copyright 2026 Gaurav Tiwari. GPL-2.0-or-later. */
(() => {
	'use strict';
	const navigation = document.querySelector('.ch-navigation');
	const menuButton = document.querySelector('.ch-menu-toggle');
	if (!navigation || !menuButton) return;
	const desktop = window.matchMedia('(min-width: 901px)');
	const icon = '<svg class="ch-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg>';
	const closeSubmenu = (button) => {
		button.setAttribute('aria-expanded', 'false');
		const submenu = document.getElementById(button.getAttribute('aria-controls'));
		if (submenu) submenu.classList.remove('ch-open');
	};
	navigation.querySelectorAll('li').forEach((item, index) => {
		const submenu = Array.from(item.children).find((child) => child.tagName === 'UL');
		const link = Array.from(item.children).find((child) => child.tagName === 'A');
		if (!submenu || !link) return;
		submenu.id = `ch-submenu-${index}`;
		const button = document.createElement('button');
		button.type = 'button';
		button.className = 'ch-submenu-toggle';
		button.setAttribute('aria-expanded', 'false');
		button.setAttribute('aria-controls', submenu.id);
		// The original menu label is already translated content supplied by WordPress.
		const label = document.createElement('span');
		label.className = 'screen-reader-text';
		label.textContent = link.textContent.trim();
		button.innerHTML = icon;
		button.prepend(label);
		link.after(button);
		button.addEventListener('click', () => {
			const open = button.getAttribute('aria-expanded') !== 'true';
			button.setAttribute('aria-expanded', String(open));
			submenu.classList.toggle('ch-open', open);
		});
	});
	const closeAll = () => {
		navigation.querySelectorAll('.ch-submenu-toggle').forEach(closeSubmenu);
		navigation.classList.remove('ch-open');
		menuButton.setAttribute('aria-expanded', 'false');
	};
	menuButton.addEventListener('click', () => {
		const open = menuButton.getAttribute('aria-expanded') !== 'true';
		menuButton.setAttribute('aria-expanded', String(open));
		navigation.classList.toggle('ch-open', open);
	});
	navigation.addEventListener('keydown', (event) => {
		if (event.key !== 'Escape') return;
		const submenu = event.target.closest('.sub-menu.ch-open');
		if (submenu) {
			const owner = Array.from(navigation.querySelectorAll('.ch-submenu-toggle')).find((button) => button.getAttribute('aria-controls') === submenu.id);
			if (owner) { closeSubmenu(owner); owner.focus(); }
		} else if (!desktop.matches && navigation.classList.contains('ch-open')) {
			closeAll();
			menuButton.focus();
		} else {
			const expanded = navigation.querySelector('.ch-submenu-toggle[aria-expanded="true"]');
			if (expanded) { closeSubmenu(expanded); expanded.focus(); }
		}
	});
	document.addEventListener('click', (event) => {
		if (!navigation.contains(event.target) && !menuButton.contains(event.target)) closeAll();
	});
	navigation.addEventListener('focusout', () => {
		window.setTimeout(() => {
			if (!navigation.contains(document.activeElement) && document.activeElement !== menuButton) closeAll();
		}, 0);
	});
	desktop.addEventListener('change', closeAll);
	// Add enhancement only after controls exist. All links remain visible without JS.
	document.documentElement.classList.add('ch-enhanced');
})();
