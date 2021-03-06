<template>
  <li
    :class="{ 'has-popup': item.childItems.edges.length > 0 }"
    class="menu-item"
    @mouseover="mouseover"
    @mouseout="mouseout"
  >
    <menu-item
      :item="item"
      :aria-haspopup="item.childItems.edges.length > 0"
      :aria-expanded="isOpen"
      class="menu-link"
      @click.native="changePage"
    />
    <button
      v-if="item.childItems.edges.length"
      :aria-expanded="isOpen"
      class="btn-show-submenu"
      @click="toggleMenu"
    >
      <icon-chevron-down
        aria-hidden="true"
        width="20"
        height="20"
        class="icon-chevron-down"
      />
      <span class="sr-only">Toon submenu voor {{ item.label }}</span>
    </button>
    <template v-if="item.childItems.edges.length">
      <animation-slide-in>
        <ul class="submenu" :class="{ 'is-open': isOpen }">
          <li
            v-for="subItem in item.childItems.edges"
            :key="subItem.node.label"
            class="menu-item"
          >
            <menu-item
              :item="subItem.node"
              class="submenu-link"
              @click.native="changePage"
            />
          </li>
        </ul>
      </animation-slide-in>
    </template>
  </li>
</template>

<script>
import MenuItem from '~/components/MenuItem.vue'
import IconChevronDown from '~/icons/chevron-down.svg'
import AnimationSlideIn from '~/components/Animations/SlideIn.vue'
import EventBusUtil from '~/utils/eventBusUtil'

export default {
  components: {
    MenuItem,
    IconChevronDown,
    AnimationSlideIn,
  },
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      isOpen: false,
      timer: null,
    }
  },
  methods: {
    changePage() {
      EventBusUtil.$emit('change-page')
    },
    toggleMenu() {
      this.isOpen = !this.isOpen
    },
    mouseover() {
      this.isOpen = true
      clearTimeout(this.timer)
    },
    mouseout() {
      this.timer = setTimeout(() => {
        this.isOpen = false
      }, 250)
    },
  },
}
</script>

<style lang="postcss" scoped>
.submenu {
  @mixin list-reset;
  margin-left: var(--spacing-m);

  @media (--navigation-md) {
    display: none;
    background: var(--color-bg-page);
    position: absolute;
    top: 100%;
    margin-left: 0;
    padding: 0 var(--spacing-xs);
    white-space: nowrap;

    &.is-open {
      display: block;
    }
  }
}

.menu-item {
  position: relative;
  @media (--navigation-md) {
    display: flex;
  }
}

.title {
  transition: box-shadow 0.1s ease-out;
  padding: var(--spacing-xxs) 0;
}

.menu-link {
  font-size: 1.2em;
  border-bottom: 3px solid transparent;

  &.nuxt-link-active[aria-haspopup='true'],
  &.nuxt-link-exact-active {
    border-bottom-color: var(--color-black);
  }

  @media (--navigation-md) {
    padding: var(--spacing-s) var(--spacing-xs);
    border-bottom: 0;
  }

  &[aria-haspopup='true'] {
    padding-right: var(--spacing-xxs);
  }
}

.submenu-link {
  font-size: 1.1em;
  border-bottom: 2px solid transparent;

  &.nuxt-link-exact-active {
    border-bottom-color: var(--color-black);
  }

  @media (--navigation-md) {
    padding: var(--spacing-xxs) 0;
    border-bottom: 0;
  }
}

.submenu-link,
.menu-link {
  @mixin link-reset;

  align-items: center;
  display: flex;
  position: relative;
  text-decoration: none;
  line-height: 1.1;
  padding: var(--spacing-xs) 0;
  border-top: 1px solid var(--color-black);

  &:hover {
    text-decoration: none;
    & .title {
      box-shadow: 0 2px 0 0 currentColor;
    }
  }
  @media (--navigation-md) {
    border-top: 0;
  }
}

.btn-show-submenu {
  display: none;
  @media (--navigation-md) {
    display: block;
    transform: translate(-0.25em, 0.25em);
  }
}
</style>
