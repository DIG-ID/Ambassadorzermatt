import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

// expo-out easing for a filmic stop
const ambassadorEaseExpoOut = (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t));

/**
 * Initialize Lenis with cinematic glide feel
 * - Slightly longer duration
 * - Expo-out easing
 * - Softer wheel multiplier for high-res devices
 * - GSAP ticker drives Lenis (single RAF source)
 */
export function ambassadorInitLenisCinematic() {
  const ambassadorLenis = new Lenis({
    duration: 1.35,
    easing: ambassadorEaseExpoOut,
    smooth: true,
    smoothWheel: true,
    wheelMultiplier: 0.85,
  });

  // keep ScrollTrigger in sync with Lenis
  ambassadorLenis.on("scroll", ScrollTrigger.update);

  // drive Lenis with GSAP's ticker to avoid double raf
  gsap.ticker.add((time) => {
    ambassadorLenis.raf(time * 1000);
  });
  gsap.ticker.lagSmoothing(0);

  return ambassadorLenis;
}


