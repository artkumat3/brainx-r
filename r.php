<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BrainX — Credit Code Generator</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- DevTool Protection -->
  <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool'></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #4F46E5 0%, #3B82F6 100%);
      min-height: 100vh;
      user-select: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
    }
    
    .card {
      backdrop-filter: blur(10px);
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      overflow: hidden;
    }
    
    .gradient-text {
      background: linear-gradient(135deg, #4F46E5 0%, #3B82F6 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .pulse {
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .code-display {
      font-family: 'Courier New', monospace;
      letter-spacing: 2px;
      background: linear-gradient(to right, #f3f4f6, #e5e7eb);
      border: 2px dashed #d1d5db;
    }
    
    .btn-copy {
      transition: all 0.3s ease;
    }
    
    .btn-copy:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-redirect {
      transition: all 0.3s ease;
    }
    
    .btn-redirect:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .countdown {
      font-family: 'Courier New', monospace;
      font-weight: bold;
      color: #ef4444;
    }
    
    .progress-bar {
      height: 6px;
      background-color: #e5e7eb;
      border-radius: 3px;
      overflow: hidden;
    }
    
    .progress-fill {
      height: 100%;
      background: linear-gradient(135deg, #4F46E5 0%, #3B82F6 100%);
      transition: width 0.3s ease;
    }
    
    .shake {
      animation: shake 0.5s ease-in-out;
    }
    
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      75% { transform: translateX(5px); }
    }
    
    .timer-display {
      font-size: 1.5rem;
      font-weight: bold;
      color: #4F46E5;
    }
    
    .security-alert {
      border-left: 4px solid #ef4444;
    }
    
    .hidden-url {
      opacity: 0;
      position: absolute;
      pointer-events: none;
    }
    
    /* Prevent text selection */
    .no-select {
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    
    /* Hide from screen readers */
    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border: 0;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-10 no-select" oncontextmenu="return false;">
  <!-- Hidden URL Protection -->
  <div class="hidden-url" id="hiddenUrlProtection">https://brainx-r.vercel.app/?ads_verified</div>
  
  <div class="card max-w-md w-full p-8">
    <div class="text-center mb-8">
      <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white">
        <i class="fas fa-gem text-2xl"></i>
      </div>
      <h1 class="text-2xl font-bold gradient-text">Credit Code Generator</h1>
      <p class="text-gray-500 mt-2 text-sm">Generate 15 credits valid for 1 hour</p>
    </div>

    <!-- Security Alert -->
    <div id="securityAlert" class="bg-red-50 security-alert rounded-lg p-4 mb-4 hidden">
      <div class="flex items-start">
        <div class="flex-shrink-0 mt-1">
          <i class="fas fa-shield-alt text-red-500"></i>
        </div>
        <div class="ml-3">
          <h3 class="text-sm font-medium text-red-800">Security Verification Failed</h3>
          <div class="mt-1 text-sm text-red-700">
            <p>Invalid access detected. Please complete the verification process properly.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Initial State - Ad Verification Required -->
    <div id="initialState" class="space-y-5">
      <div class="bg-yellow-50 rounded-lg p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0 mt-1">
            <i class="fas fa-exclamation-triangle text-yellow-500"></i>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-yellow-800">Verification Required</h3>
            <div class="mt-1 text-sm text-yellow-700">
              <p>Complete verification to generate your credit code.</p>
              <p class="mt-2"><strong>Cooldown:</strong> 5 hours between codes</p>
            </div>
          </div>
        </div>
      </div>
      
      <button id="verifyBtn"
              class="w-full py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-semibold rounded-lg hover:from-amber-600 hover:to-amber-700 transition-all duration-300 shadow-lg pulse flex items-center justify-center no-select">
        <i class="fas fa-shield-check mr-2"></i>
        Start Verification
      </button>
      
      <div class="text-center text-xs text-gray-500 mt-2">
        <p>ⓘ Opens in new window for security verification</p>
      </div>
    </div>

    <!-- Verification Processing -->
    <div id="processingState" class="space-y-5 hidden">
      <div class="bg-blue-50 rounded-lg p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0 mt-1">
            <i class="fas fa-sync-alt text-blue-500 fa-spin"></i>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">Verification in Progress</h3>
            <div class="mt-1 text-sm text-blue-700">
              <p>Please complete the verification in the new window.</p>
              <p class="mt-1">Return here after completion.</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="text-center">
        <button id="cancelVerifyBtn" class="text-sm text-gray-500 hover:text-gray-700 underline">
          Cancel Verification
        </button>
      </div>
    </div>

    <!-- After Verification - Generate Code -->
    <div id="generateSection" class="space-y-5 hidden">
      <div class="bg-green-50 rounded-lg p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0 mt-1">
            <i class="fas fa-check-circle text-green-500"></i>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-green-800">Verification Complete</h3>
            <div class="mt-1 text-sm text-green-700">
              <p>Successfully verified. You can now generate your code.</p>
              <p class="mt-1 font-semibold">Next code available after 5 hours</p>
            </div>
          </div>
        </div>
      </div>

      <form id="generateForm" class="space-y-5">
        <button type="submit"
                class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg pulse flex items-center justify-center no-select">
          <i class="fas fa-bolt mr-2"></i>
          Generate Credit Code
        </button>
      </form>
    </div>

    <!-- Code Display Section -->
    <div id="codeSection" class="mt-6 hidden fade-in">
      <div class="text-center mb-4">
        <h3 class="text-lg font-semibold text-gray-800">Your Code is Ready!</h3>
        <p class="text-sm text-gray-500">Valid for 1 hour • 15 Credits</p>
      </div>
      
      <div class="code-display rounded-lg p-4 mb-4 text-center">
        <span id="generatedCode" class="text-xl font-bold text-gray-800"></span>
      </div>
      
      <div class="flex space-x-3">
        <button id="copyBtn" class="btn-copy flex-1 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-all flex items-center justify-center no-select">
          <i class="far fa-copy mr-2"></i>
          Copy Code
        </button>
        <button id="redirectBtn" class="btn-redirect flex-1 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-lg hover:from-green-600 hover:to-green-700 transition-all flex items-center justify-center no-select">
          <i class="fas fa-external-link-alt mr-2"></i>
          Use Now
        </button>
      </div>
    </div>

    <!-- Cooldown State -->
    <div id="cooldownState" class="space-y-5 hidden">
      <div class="bg-purple-50 rounded-lg p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0 mt-1">
            <i class="fas fa-clock text-purple-500"></i>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-purple-800">Next Code Available In</h3>
            <div class="mt-1 text-sm text-purple-700">
              <p>You can generate your next code in:</p>
              <p id="countdownTimer" class="timer-display mt-2">05:00:00</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="progress-bar">
        <div id="cooldownProgress" class="progress-fill" style="width: 0%"></div>
      </div>
      
      <p class="text-center text-sm text-gray-500">
        5-hour cooldown between code generations
      </p>
    </div>

    <!-- Already Generated State -->
    <div id="alreadyGeneratedState" class="space-y-5 hidden">
      <div class="bg-blue-50 rounded-lg p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0 mt-1">
            <i class="fas fa-check-circle text-blue-500"></i>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">Active Code Available</h3>
            <div class="mt-1 text-sm text-blue-700">
              <p>Your current active code:</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="code-display rounded-lg p-4 text-center">
        <span id="existingCode" class="text-xl font-bold text-gray-800"></span>
      </div>
      
      <div class="flex space-x-3">
        <button id="copyExistingBtn" class="btn-copy flex-1 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-all flex items-center justify-center no-select">
          <i class="far fa-copy mr-2"></i>
          Copy Code
        </button>
        <button id="redirectExistingBtn" class="btn-redirect flex-1 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-medium rounded-lg hover:from-green-600 hover:to-green-700 transition-all flex items-center justify-center no-select">
          <i class="fas fa-external-link-alt mr-2"></i>
          Use Now
        </button>
      </div>
    </div>

    <div id="status" class="mt-6 text-center hidden fade-in">
      <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium">
        <i id="statusIcon" class="mr-2"></i>
        <span id="statusText" class="text-gray-800"></span>
      </div>
    </div>
    
    <div class="mt-8 pt-6 border-t border-gray-200">
      <div class="flex justify-between text-sm text-gray-500">
        <div class="flex items-center">
          <i class="fas fa-coins mr-1"></i>
          <span>15 Credits</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-clock mr-1"></i>
          <span>1 Hour</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-redo mr-1"></i>
          <span>5 Hours</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Security Configuration
    const SECURITY_CONFIG = {
      COOLDOWN_TIME: 5 * 60 * 60 * 1000, // 5 hours
      VERIFICATION_TIMEOUT: 300000, // 5 minutes
      TOKEN_LENGTH: 32
    };

    let generatedCode = '';
    let redirectUrl = '';
    let cooldownInterval = null;
    let verificationWindow = null;
    let verificationTimeout = null;

    // Enhanced security token generation
    const generateSecurityToken = () => {
      const array = new Uint8Array(SECURITY_CONFIG.TOKEN_LENGTH);
      crypto.getRandomValues(array);
      return Array.from(array, byte => byte.toString(16).padStart(2, '0')).join('');
    };

    // Initialize security
    const initializeSecurity = () => {
      // Clear any existing URL parameters immediately
      if (window.location.search) {
        const cleanUrl = window.location.origin + window.location.pathname;
        window.history.replaceState(null, '', cleanUrl);
      }

      // Generate session security token
      if (!sessionStorage.getItem('securityToken')) {
        sessionStorage.setItem('securityToken', generateSecurityToken());
      }
    };

    // Enhanced URL cleaning with multiple layers
    const cleanUrlSafely = () => {
      try {
        const cleanUrl = window.location.origin + window.location.pathname;
        // Multiple replacement methods for maximum compatibility
        window.history.replaceState(null, '', cleanUrl);
        setTimeout(() => {
          window.history.replaceState(null, '', cleanUrl);
        }, 100);
      } catch (error) {
        console.log('URL cleaning completed');
      }
    };

    // Check user state when page loads
    document.addEventListener('DOMContentLoaded', function() {
      initializeSecurity();
      
      const hasCodeGenerated = localStorage.getItem('codeGenerated') === 'true';
      const existingCode = localStorage.getItem('generatedCode');
      const lastGeneratedTime = localStorage.getItem('lastGeneratedTime');
      const currentSecurityToken = sessionStorage.getItem('securityToken');
      
      // Clean URL on every load
      cleanUrlSafely();

      // Check if user is on cooldown
      if (lastGeneratedTime) {
        const timeSinceLast = Date.now() - parseInt(lastGeneratedTime);
        
        if (timeSinceLast < SECURITY_CONFIG.COOLDOWN_TIME) {
          showCooldownState(SECURITY_CONFIG.COOLDOWN_TIME - timeSinceLast);
          return;
        } else {
          localStorage.removeItem('lastGeneratedTime');
        }
      }
      
      // Check if user has already generated a code
      if (hasCodeGenerated && existingCode) {
        showAlreadyGeneratedState(existingCode);
        return;
      }
      
      // Enhanced security verification
      const verificationToken = sessionStorage.getItem('verificationToken');
      const verificationSecurityToken = sessionStorage.getItem('verificationSecurityToken');
      
      if (verificationToken && verificationSecurityToken === currentSecurityToken) {
        // Legitimate verification completed
        sessionStorage.removeItem('verificationToken');
        sessionStorage.removeItem('verificationSecurityToken');
        localStorage.setItem('adsVerified', 'true');
        showGenerateSection();
      } else if (localStorage.getItem('adsVerified') === 'true' && !hasCodeGenerated) {
        // Previously verified user
        showGenerateSection();
      }
    });

    // Show generate section
    function showGenerateSection() {
      document.getElementById('initialState').classList.add('hidden');
      document.getElementById('processingState').classList.add('hidden');
      document.getElementById('securityAlert').classList.add('hidden');
      document.getElementById('generateSection').classList.remove('hidden');
      cleanUrlSafely();
    }

    // Show security alert
    function showSecurityAlert(message = 'Security verification failed. Please complete the proper verification process.') {
      document.getElementById('initialState').classList.remove('hidden');
      document.getElementById('processingState').classList.add('hidden');
      document.getElementById('generateSection').classList.add('hidden');
      document.getElementById('securityAlert').classList.remove('hidden');
      
      const alertText = document.querySelector('#securityAlert .text-red-700 p');
      if (alertText) {
        alertText.textContent = message;
      }
      
      cleanUrlSafely();
      
      // Auto-hide security alert after 8 seconds
      setTimeout(() => {
        document.getElementById('securityAlert').classList.add('hidden');
      }, 8000);
    }

    // Show cooldown state with countdown
    function showCooldownState(timeRemaining) {
      document.getElementById('initialState').classList.add('hidden');
      document.getElementById('generateSection').classList.add('hidden');
      document.getElementById('codeSection').classList.add('hidden');
      document.getElementById('securityAlert').classList.add('hidden');
      document.getElementById('processingState').classList.add('hidden');
      document.getElementById('cooldownState').classList.remove('hidden');
      
      updateCountdown(timeRemaining);
      
      // Start countdown timer
      cooldownInterval = setInterval(() => {
        timeRemaining -= 1000;
        
        if (timeRemaining <= 0) {
          clearInterval(cooldownInterval);
          localStorage.removeItem('lastGeneratedTime');
          document.getElementById('cooldownState').classList.add('hidden');
          
          // Show appropriate section based on verification status
          if (localStorage.getItem('adsVerified') === 'true') {
            document.getElementById('generateSection').classList.remove('hidden');
          } else {
            document.getElementById('initialState').classList.remove('hidden');
          }
        } else {
          updateCountdown(timeRemaining);
        }
      }, 1000);
    }
    
    // Update countdown display
    function updateCountdown(timeRemaining) {
      const hours = Math.floor(timeRemaining / (1000 * 60 * 60));
      const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
      
      document.getElementById('countdownTimer').textContent = 
        `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      
      // Update progress bar
      const progress = 100 - (timeRemaining / SECURITY_CONFIG.COOLDOWN_TIME * 100);
      document.getElementById('cooldownProgress').style.width = `${progress}%`;
    }

    // Show already generated state
    function showAlreadyGeneratedState(code) {
      document.getElementById('initialState').classList.add('hidden');
      document.getElementById('generateSection').classList.add('hidden');
      document.getElementById('codeSection').classList.add('hidden');
      document.getElementById('cooldownState').classList.add('hidden');
      document.getElementById('securityAlert').classList.add('hidden');
      document.getElementById('processingState').classList.add('hidden');
      document.getElementById('alreadyGeneratedState').classList.remove('hidden');
      
      document.getElementById('existingCode').textContent = code;
      redirectUrl = `https://brainx.base44.app/claim-credit?code=${encodeURIComponent(code)}`;
      cleanUrlSafely();
    }

    // Show status message
    function showStatus(message, type = 'info') {
      const status = document.getElementById("status");
      const statusText = document.getElementById("statusText");
      const statusIcon = document.getElementById("statusIcon");
      
      statusText.textContent = message;
      
      if (type === 'error') {
        statusIcon.className = "fas fa-exclamation-circle mr-2 text-red-500";
        status.className = "mt-6 text-center fade-in bg-red-50 rounded-lg py-3";
      } else if (type === 'success') {
        statusIcon.className = "fas fa-check-circle mr-2 text-green-500";
        status.className = "mt-6 text-center fade-in bg-green-50 rounded-lg py-3";
      } else {
        statusIcon.className = "fas fa-info-circle mr-2 text-blue-500";
        status.className = "mt-6 text-center fade-in bg-blue-50 rounded-lg py-3";
      }
      
      status.classList.remove("hidden");
      
      // Auto hide after 5 seconds
      setTimeout(() => {
        status.classList.add("hidden");
      }, 5000);
    }

    // Start verification process
    document.getElementById("verifyBtn").addEventListener("click", function() {
      const securityToken = sessionStorage.getItem('securityToken');
      const verificationToken = generateSecurityToken();
      
      // Store verification tokens
      sessionStorage.setItem('verificationToken', verificationToken);
      sessionStorage.setItem('verificationSecurityToken', securityToken);
      sessionStorage.setItem('verificationStartTime', Date.now().toString());
      
      // Show processing state
      document.getElementById('initialState').classList.add('hidden');
      document.getElementById('processingState').classList.remove('hidden');
      
      // Open verification in new window with enhanced features
      const windowFeatures = 'width=500,height=600,menubar=no,toolbar=no,location=no,status=no';
      verificationWindow = window.open("https://earn4link.in/gTqLGmyzaz1M2f", "_blank", windowFeatures);
      
      if (!verificationWindow) {
        showSecurityAlert('Please allow popups to complete verification.');
        document.getElementById('processingState').classList.add('hidden');
        document.getElementById('initialState').classList.remove('hidden');
        sessionStorage.removeItem('verificationToken');
        sessionStorage.removeItem('verificationSecurityToken');
      } else {
        showStatus('Verification window opened. Complete the process there.', 'info');
        
        // Set verification timeout
        verificationTimeout = setTimeout(() => {
          if (verificationWindow && !verificationWindow.closed) {
            verificationWindow.close();
          }
          showSecurityAlert('Verification timeout. Please try again.');
          document.getElementById('processingState').classList.add('hidden');
          document.getElementById('initialState').classList.remove('hidden');
        }, SECURITY_CONFIG.VERIFICATION_TIMEOUT);
        
        // Focus on current tab
        window.focus();
      }
    });

    // Cancel verification
    document.getElementById("cancelVerifyBtn").addEventListener("click", function() {
      if (verificationWindow && !verificationWindow.closed) {
        verificationWindow.close();
      }
      if (verificationTimeout) {
        clearTimeout(verificationTimeout);
      }
      sessionStorage.removeItem('verificationToken');
      sessionStorage.removeItem('verificationSecurityToken');
      document.getElementById('processingState').classList.add('hidden');
      document.getElementById('initialState').classList.remove('hidden');
      showStatus('Verification cancelled.', 'info');
    });

    // Generate redemption code
    async function generateRedemptionCode() {
      const status = document.getElementById("status");
      const statusText = document.getElementById("statusText");
      const statusIcon = document.getElementById("statusIcon");
      const button = document.querySelector('#generateForm button[type="submit"]');
      const codeSection = document.getElementById("codeSection");
      const generatedCodeElement = document.getElementById("generatedCode");
      
      // Security check
      const lastGeneratedTime = localStorage.getItem('lastGeneratedTime');
      if (lastGeneratedTime) {
        const timeSinceLast = Date.now() - parseInt(lastGeneratedTime);
        if (timeSinceLast < SECURITY_CONFIG.COOLDOWN_TIME) {
          showStatus(`Please wait ${formatTime(SECURITY_CONFIG.COOLDOWN_TIME - timeSinceLast)} before generating another code.`, 'error');
          return;
        }
      }
      
      // Disable button and show loading state
      button.disabled = true;
      button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Generating...';
      button.classList.remove('pulse');
      
      status.classList.remove("hidden");
      statusText.textContent = "Generating secure code...";
      statusIcon.className = "fas fa-spinner fa-spin mr-2 text-blue-500";
      status.className = "mt-6 text-center fade-in";
      
      // Generate unique code
      generatedCode = 'RC-' + Math.random().toString(36).substring(2, 10).toUpperCase();
      const expiresAt = new Date(Date.now() + 60 * 60 * 1000).toISOString();

      const newCodeData = {
        code: generatedCode,
        credits: 15,
        expires_at: expiresAt,
        max_uses: 1,
        current_uses: 0,
        is_used: false,
        description: "15 credit code via Secure Generator"
      };

      try {
        const response = await fetch(`https://app.base44.com/api/apps/68cbebefa029f14aca657882/entities/RedemptionCode`, {
          method: 'POST',
          headers: {
            'api_key': 'a59ffe885a234413baaa0ff678844bc5',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(newCodeData)
        });

        if (!response.ok) {
          throw new Error("Failed to create redemption code.");
        }

        const result = await response.json();
        
        // Update the UI with the generated code
        generatedCodeElement.textContent = generatedCode;
        codeSection.classList.remove("hidden");
        codeSection.classList.add("fade-in");
        
        // Set the redirect URL
        redirectUrl = `https://brainx.base44.app/claim-credit?code=${encodeURIComponent(result.code)}`;
        
        // Mark code as generated and set cooldown
        localStorage.setItem('codeGenerated', 'true');
        localStorage.setItem('generatedCode', generatedCode);
        localStorage.setItem('lastGeneratedTime', Date.now().toString());
        
        // Show success state
        showStatus('Code generated successfully! Next code available in 5 hours.', 'success');
        
        button.innerHTML = '<i class="fas fa-check mr-2"></i> Generated!';
        button.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-indigo-600');
        button.classList.add('bg-gradient-to-r', 'from-green-500', 'to-green-600');
        
        // Hide generate section and show cooldown after delay
        setTimeout(() => {
          document.getElementById('generateSection').classList.add('hidden');
          document.getElementById('codeSection').classList.add('hidden');
          showCooldownState(SECURITY_CONFIG.COOLDOWN_TIME);
        }, 3000);

      } catch (error) {
        // Show error state
        showStatus("Error: " + error.message, 'error');
        
        button.innerHTML = '<i class="fas fa-bolt mr-2"></i> Try Again';
        button.classList.remove('bg-gradient-to-r', 'from-green-500', 'to-green-600');
        button.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-indigo-600');
        button.disabled = false;
      }
    }

    // Format time for display
    function formatTime(milliseconds) {
      const hours = Math.floor(milliseconds / (1000 * 60 * 60));
      const minutes = Math.floor((milliseconds % (1000 * 60 * 60)) / (1000 * 60));
      return `${hours}h ${minutes}m`;
    }

    // Copy code to clipboard
    document.getElementById("copyBtn").addEventListener("click", function() {
      navigator.clipboard.writeText(generatedCode).then(() => {
        const copyBtn = document.getElementById("copyBtn");
        const originalText = copyBtn.innerHTML;
        
        copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Copied!';
        copyBtn.classList.remove('bg-gray-100', 'text-gray-700');
        copyBtn.classList.add('bg-green-100', 'text-green-700');
        
        setTimeout(() => {
          copyBtn.innerHTML = originalText;
          copyBtn.classList.remove('bg-green-100', 'text-green-700');
          copyBtn.classList.add('bg-gray-100', 'text-gray-700');
        }, 2000);
      });
    });

    // Copy existing code to clipboard
    document.getElementById("copyExistingBtn").addEventListener("click", function() {
      const existingCode = localStorage.getItem('generatedCode');
      if (existingCode) {
        navigator.clipboard.writeText(existingCode).then(() => {
          const copyBtn = document.getElementById("copyExistingBtn");
          const originalText = copyBtn.innerHTML;
          
          copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i> Copied!';
          copyBtn.classList.remove('bg-gray-100', 'text-gray-700');
          copyBtn.classList.add('bg-green-100', 'text-green-700');
          
          setTimeout(() => {
            copyBtn.innerHTML = originalText;
            copyBtn.classList.remove('bg-green-100', 'text-green-700');
            copyBtn.classList.add('bg-gray-100', 'text-gray-700');
          }, 2000);
        });
      }
    });

    // Redirect to claim page
    document.getElementById("redirectBtn").addEventListener("click", function() {
      if (redirectUrl) {
        window.location.href = redirectUrl;
      }
    });

    // Redirect to claim page for existing code
    document.getElementById("redirectExistingBtn").addEventListener("click", function() {
      const existingCode = localStorage.getItem('generatedCode');
      if (existingCode) {
        window.location.href = `https://brainx.base44.app/claim-credit?code=${encodeURIComponent(existingCode)}`;
      }
    });

    document.getElementById("generateForm").addEventListener("submit", function (e) {
      e.preventDefault();
      generateRedemptionCode();
    });

    // Enhanced security: Prevent keyboard shortcuts
    document.addEventListener('keydown', function(e) {
      // Block F12, Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U
      if (e.key === 'F12' || 
          (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J')) ||
          (e.ctrlKey && e.key === 'u')) {
        e.preventDefault();
        return false;
      }
    });

    // Prevent right-click context menu
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
      return false;
    });

    // Clean URL on visibility change (tab switch)
    document.addEventListener('visibilitychange', function() {
      if (!document.hidden) {
        cleanUrlSafely();
      }
    });

    // Clean URL on page focus
    window.addEventListener('focus', function() {
      cleanUrlSafely();
    });
  </script>
</body>
</html>