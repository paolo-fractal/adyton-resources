import { createRoot } from 'react-dom/client'
import App from './App.tsx'
import './index.css'

// 1. IMPORT THE COMPONENTS YOU WANT TO USE IN WORDPRESS
import HeroSection from '@/components/home/HeroSection';
import CopperUpsideSection from '@/components/home/CopperUpsideSection';
import MetricCard from '@/components/MetricCard';
import KeyMessages from '@/components/KeyMessages';

// 2. CREATE A MAP OF THOSE COMPONENTS
const componentRegistry: Record<string, React.ElementType> = {
  'HeroSection': HeroSection,
  'MetricCard': MetricCard,
  'KeyMessages': KeyMessages,
  // Add more here as you build them!
};

// 3. SCAN THE PAGE FOR MOUNTING POINTS
const mountPoints = document.querySelectorAll('.adyton-react-mount');

if (mountPoints.length > 0) {
  // If we are inside WordPress and found shortcodes, render them individually!
  mountPoints.forEach((mountNode) => {
    const componentName = mountNode.getAttribute('data-component');
    
    if (componentName && componentRegistry[componentName]) {
      const ComponentToRender = componentRegistry[componentName];
      const root = createRoot(mountNode);
      root.render(<ComponentToRender />);
    }
  });
} else {
  // 4. FALLBACK: If no shortcodes are found, render the normal SPA (for local development)
  const rootElement = document.getElementById("root");
  if (rootElement) {
    createRoot(rootElement).render(<App />);
  }
}